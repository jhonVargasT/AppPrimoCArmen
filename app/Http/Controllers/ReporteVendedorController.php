<?php

namespace App\Http\Controllers;

use App\boleta;
use App\feedSoap;
use App\NumeroALetras;
use App\Pedido;
use App\Producto;
use App\ProductoPedido;
use App\Usuario;
use App\util;
use http\Exception;
use Illuminate\Support\Facades\Storage;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use DOMDocument;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\File;

class ReporteVendedorController extends Controller
{
    public function index()
    {
        return view('pagina/vendedor/reporte_vendedor');
    }

    public function obtenerPedido()
    {
        return datatables()->of(Pedido::reporteVendedor(Session('idusuario')))->toJson();
    }

    public function obtenerPrdocutosPedido($idpedido)

    {
        return datatables()->of(ProductoPedido::consultarProductosPedido($idpedido))->toJson();
    }

    public function enviarfactura($idpedido)

    {
        //return datatables()->of(ProductoPedido::consultarProductosPedido($idpedido))->toJson();
        $pedido = Pedido::obtenerCabezaFactura($idpedido);

        $productos = Producto::obtenerProductosTicket($idpedido);
        $impuestos = Pedido::obetenerCuerpoTicket($idpedido);


        $this->factura_xml($idpedido, $pedido, $productos, $impuestos);

    }

    public function obtenerComision()
    {
        try {
            $idusuario = Session('idusuario');
            $comision = Usuario::obtenerComision($idusuario);
            foreach ($comision as $com) {
                $comision = $com->suma;
            }
            return response()->json(array('error' => 1, 'comi' => $comision));
        } catch (Exception $e) {
            return response()->json(array('error' => 2));
        }

    }

    public function factura_xml($idpedido, $pedido, $productos, $impuestos)
    {
        $invoice_line = null;
        $count = 1;
         $nroboleta=Boleta::obtenerUltimaBoleta();
        //$boleta = Boleta::where('id_Pedido', '=', $idpedido)->get()->first();


        foreach ($productos as $producto) {

            if ($producto->cantidadUnidades > 0) {
                $cantidad = $producto->cantidadUnidades;
                $precio = $producto->precioVentaUnidad * $cantidad;
                $invoice_line[$count] = '
                                   <cac:InvoiceLine>
                                      <cbc:ID>' . $count . '</cbc:ID>
                                      <cbc:InvoicedQuantity unitCode="NIU">' . number_format((float)$cantidad, 2, '.', '') . '</cbc:InvoicedQuantity>
                                      <cbc:LineExtensionAmount currencyID="PEN">' . number_format((float)$precio, 2, '.', '') . '</cbc:LineExtensionAmount>
                                      <cac:PricingReference>
                                            <cac:AlternativeConditionPrice>
                                                 <cbc:PriceAmount currencyID="PEN">0.00</cbc:PriceAmount>
                                                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
                                            </cac:AlternativeConditionPrice>
                                      </cac:PricingReference>
                                       <cac:AllowanceCharge>
                                          <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
                                          <cbc:Amount currencyID="PEN">0.00</cbc:Amount>
                                      </cac:AllowanceCharge>
                                      <cac:TaxTotal>
                                         <cbc:TaxAmount currencyID="PEN">0.00</cbc:TaxAmount>
                                         <cac:TaxSubtotal>
                                            <cbc:TaxAmount currencyID="PEN">0.00</cbc:TaxAmount>
                                            <cbc:Percent>18.0</cbc:Percent>
                                            <cac:TaxCategory>
                                               <cbc:TaxExemptionReasonCode>10</cbc:TaxExemptionReasonCode>
                                               <cbc:TierRange>00</cbc:TierRange>
                                               <cac:TaxScheme>
                                                  <cbc:ID>1000</cbc:ID>
                                                  <cbc:Name>IGV</cbc:Name>
                                                  <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                                               </cac:TaxScheme>
                                            </cac:TaxCategory>
                                         </cac:TaxSubtotal>
                                      </cac:TaxTotal>
                                      <cac:Item>
                                         <cbc:Description>' . $producto->nombre . '</cbc:Description>
                                         <cac:SellersItemIdentification>
                                            <cbc:ID>' . $producto->id . '</cbc:ID>
                                         </cac:SellersItemIdentification>
                                      </cac:Item>
                                      <cac:Price>
                                         <cbc:PriceAmount currencyID="PEN">' . number_format((float)$producto->precioVentaUnidad, 2, '.', '') . '</cbc:PriceAmount>
                                      </cac:Price>
                                   </cac:InvoiceLine>';
                $count++;
            } elseif ($producto->cantidadPaquetes > 0) {
                $cantidad = $producto->cantidadPaquetes;
                $precio = $producto->precioVenta * $cantidad;

                $invoice_line[$count] = '
                                   <cac:InvoiceLine>
                                      <cbc:ID>' . $count . '</cbc:ID>
                                      <cbc:InvoicedQuantity unitCode="NIU">' . number_format((float)$cantidad, 2, '.', '') . '</cbc:InvoicedQuantity>
                                      <cbc:LineExtensionAmount currencyID="PEN">' . number_format((float)$precio, 2, '.', '') . '</cbc:LineExtensionAmount>
                                      <cac:PricingReference>
                                            <cac:AlternativeConditionPrice>
                                                 <cbc:PriceAmount currencyID="PEN">0.00</cbc:PriceAmount>
                                                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
                                            </cac:AlternativeConditionPrice>
                                      </cac:PricingReference>
                                      <cac:AllowanceCharge>
                                          <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
                                          <cbc:Amount currencyID="PEN">0.00</cbc:Amount>
                                      </cac:AllowanceCharge>
                                      <cac:TaxTotal>
                                         <cbc:TaxAmount currencyID="PEN">0.00</cbc:TaxAmount>
                                         <cac:TaxSubtotal>
                                            <cbc:TaxAmount currencyID="PEN">0.00</cbc:TaxAmount>
                                            <cbc:Percent>18.0</cbc:Percent>
                                            <cac:TaxCategory>
                                               <cbc:TaxExemptionReasonCode>10</cbc:TaxExemptionReasonCode>
                                               <cbc:TierRange>00</cbc:TierRange>
                                               <cac:TaxScheme>
                                                  <cbc:ID>1000</cbc:ID>
                                                  <cbc:Name>IGV</cbc:Name>
                                                  <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                                               </cac:TaxScheme>
                                            </cac:TaxCategory>
                                         </cac:TaxSubtotal>
                                      </cac:TaxTotal>
                                      <cac:Item>
                                         <cbc:Description>' . $producto->nombre . '</cbc:Description>
                                         <cac:SellersItemIdentification>
                                            <cbc:ID>' . $producto->id . '</cbc:ID>
                                         </cac:SellersItemIdentification>
                                      </cac:Item>
                                      <cac:Price>
                                         <cbc:PriceAmount currencyID="PEN">' . number_format((float)$producto->precioVenta, 2, '.', '') . '</cbc:PriceAmount>
                                      </cac:Price>
                                   </cac:InvoiceLine>';
                $count++;
            }
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ccts="urn:un:unece:uncefact:documentation:2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:sac="urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                   <ext:UBLExtensions>
                      <ext:UBLExtension>
                         <ext:ExtensionContent>
                            <sac:AdditionalInformation>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1001</cbc:ID>
                                  <cbc:PayableAmount currencyID="PEN">' . $impuestos[0]->opgrav . '</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1002</cbc:ID>
                                  <cbc:PayableAmount currencyID="PEN">0.00</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1004</cbc:ID>
                                  <cbc:PayableAmount currencyID="PEN">0.00</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>2005</cbc:ID>
                                  <cbc:PayableAmount currencyID="PEN">0.00</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalProperty>
                                  <cbc:ID>1000</cbc:ID>
                                  <cbc:Value>' . NumeroALetras::convertir($impuestos[0]->tot) . '</cbc:Value>
                               </sac:AdditionalProperty>
                            </sac:AdditionalInformation>
                         </ext:ExtensionContent>
                      </ext:UBLExtension>
                      <ext:UBLExtension>
                      <ext:ExtensionContent></ext:ExtensionContent>
                   </ext:UBLExtension>
                   </ext:UBLExtensions>
                   <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
                   <cbc:CustomizationID>1.0</cbc:CustomizationID>
                   <cbc:ID>F001-' . $boleta->nroboleta . '</cbc:ID>
                   <cbc:IssueDate>' . date("Y-m-d") . '</cbc:IssueDate>
                   <cbc:InvoiceTypeCode>01</cbc:InvoiceTypeCode>
                   <cbc:DocumentCurrencyCode>PEN</cbc:DocumentCurrencyCode>
                   <cac:Signature>
                      <cbc:ID>F001-' . $boleta->nroboleta . '</cbc:ID>
                      <cac:SignatoryParty>
                         <cac:PartyIdentification>
                            <cbc:ID>20602872182</cbc:ID>
                         </cac:PartyIdentification>
                         <cac:PartyName>
                            <cbc:Name>ARPEMAR S.A.C.</cbc:Name>
                         </cac:PartyName>
                      </cac:SignatoryParty>
                      <cac:DigitalSignatureAttachment>
                         <cac:ExternalReference>
                            <cbc:URI>#F001-' . $boleta->nroboleta . '</cbc:URI>
                         </cac:ExternalReference>
                      </cac:DigitalSignatureAttachment>
                   </cac:Signature>
                   <cac:AccountingSupplierParty>
                      <cbc:CustomerAssignedAccountID>20602872182</cbc:CustomerAssignedAccountID>
                      <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
                      <cac:Party>
                          <cac:PostalAddress>
                              <cbc:ID>150106</cbc:ID>
                              <cbc:StreetName>PARCELA 32B ASC. FUNDO SANTO TOMAS</cbc:StreetName>
                              <cbc:CitySubdivisionName>San Juan de Lurigancho</cbc:CitySubdivisionName>
                              <cbc:CityName>LIMA</cbc:CityName>
                              <cbc:CountrySubentity></cbc:CountrySubentity>
                              <cbc:District>Carabayllo</cbc:District>
                              <cac:Country>
                                <cbc:IdentificationCode>PE</cbc:IdentificationCode>
                              </cac:Country>
                          </cac:PostalAddress>
                          <cac:PartyLegalEntity>
                          <cbc:RegistrationName>ARPEMAR S.A.C.</cbc:RegistrationName>
                          </cac:PartyLegalEntity>
                      </cac:Party>
                   </cac:AccountingSupplierParty>
                   <cac:AccountingCustomerParty>
                      <cbc:CustomerAssignedAccountID>' . $pedido[0]->dni . '</cbc:CustomerAssignedAccountID>
                      <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
                      <cac:Party>
                         <cac:PartyLegalEntity>
                            <cbc:RegistrationName>' . $pedido[0]->clie . '</cbc:RegistrationName>
                            <cac:RegistrationAddress>
                                <cbc:StreetName>' . $pedido[0]->direccion . '</cbc:StreetName>
                            </cac:RegistrationAddress>
                         </cac:PartyLegalEntity>
                      </cac:Party>
                   </cac:AccountingCustomerParty>
                   <cac:TaxTotal>
                      <cbc:TaxAmount currencyID="PEN">' . number_format((float)($impuestos[0]->igv), 2, '.', '') . '</cbc:TaxAmount>
                      <cac:TaxSubtotal>
                         <cbc:TaxAmount currencyID="PEN">' . number_format((float)($impuestos[0]->igv), 2, '.', '') . '</cbc:TaxAmount>
                         <cac:TaxCategory>
                            <cac:TaxScheme>
                               <cbc:ID>1000</cbc:ID>
                               <cbc:Name>IGV</cbc:Name>
                               <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                            </cac:TaxScheme>
                         </cac:TaxCategory>
                      </cac:TaxSubtotal>
                   </cac:TaxTotal>
                   <cac:LegalMonetaryTotal>
                      <cbc:PayableAmount currencyID="PEN">' . number_format((float)$impuestos[0]->tot, 2, '.', '') . '</cbc:PayableAmount>
                   </cac:LegalMonetaryTotal>';
        for ($i = 1; $i <= count($invoice_line); $i++) {
            $xml .= $invoice_line[$i];
        }

        $xml .= '</Invoice>';

        $filename = '20602872182-01-F001-' . $boleta->nroboleta;


        $exists = Storage::disk('xml')->exists($filename . '.xml');

        if ($exists == false) {

            File::put(public_path('xml/' . $filename . '.xml'), $xml);

            $this->firmar_documento($filename);

            $this->comprimir_factura($filename);

            $this->consumo_soap($filename);
            Boleta::cambiarNumeroBoleta($idpedido,$filename,util::fecha());

        }
    }

    public function firmar_documento($filename)
    {
        $doc = new DOMDocument();
        $doc->load('../public/xml/' . $filename . '.xml');
        // Crear un nuevo objeto de seguridad
        $objDSig = new XMLSecurityDSig();
        // Utilizar la canonización exclusiva de c14n
        $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
        // Firmar con SHA-256
        $objDSig->addReference(
            $doc,
            XMLSecurityDSig::SHA1,
            array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'),
            array('force_uri' => true)
        );
        //Crear una nueva clave de seguridad (privada)
        $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type' => 'private'));

        //If key has a passphrase, set it using
        $objKey->passphrase = 'DqhikNMrcy5wEysR';

        //Cargamos la clave privada
        $objKey->loadKey('../public/certificado/private.pem', TRUE);
        $objDSig->sign($objKey);
        // Agregue la clave pública asociada a la firma
        $objDSig->add509Cert(file_get_contents('../public/certificado/public.pem'), true, false, array('subjectName' => true));
        // Anexar la firma al XML
        $objDSig->appendSignature($doc->getElementsByTagName('ExtensionContent')->item(1));

        // Guardar el XML firmado
        $doc->save('../public/xml/' . $filename . '.xml');
    }

    private function comprimir_factura($filename)
    {
        $zip = Zip::create($filename . '.zip');

        $zip->add('../public/xml/' . $filename . '.xml');

        $zip->close();

        rename('../public/' . $filename . '.zip', '../public/zip/' . $filename . '.zip');
    }

    private function consumo_soap($filename)
    {
        $nombre_archivo = $filename . '.zip';
        $wsdlURL = 'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl';
        $XMLString = '<?xml version="1.0" encoding="UTF-8"?>
        <soapenv:Envelope 
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
        xmlns:ser="http://service.sunat.gob.pe" 
        xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
        <soapenv:Header>
        <wsse:Security>
        <wsse:UsernameToken>
        <wsse:Username>20602872182MODDATOS</wsse:Username>
        <wsse:Password>moddatos</wsse:Password>
        </wsse:UsernameToken>
        </wsse:Security>
        </soapenv:Header>
        <soapenv:Body>
        <ser:sendBill>
        <fileName>' . $nombre_archivo . '</fileName>
        <contentFile>' . base64_encode(file_get_contents('../public/zip/' . $filename . '.zip')) . '</contentFile>
        </ser:sendBill>
        </soapenv:Body>
        </soapenv:Envelope>';

        $this->soapCall($wsdlURL, $callFunction = "sendBill", $XMLString, $filename);

    }

    function soapCall($wsdlURL, $callFunction = "", $XMLString, $filename)
    {
        $client = new feedSoap($wsdlURL, array('trace' => true));
        $client->SoapClientCall($XMLString);
        $client->__call($callFunction, array(), array());
        $result = $client->__getLastResponse();
        $this->descargar_cdr($result, $filename);
    }


    function descargar_cdr($result, $filename)
    {
        $repuesta = null;
        $archivo = fopen('../public/xml/' . 'C' . $filename . '.xml', 'w+');
        fputs($archivo, $result);
        fclose($archivo);
        //LEEMOS EL ARCHIVO XML
        $xml = simplexml_load_file('../public/xml/' . 'C' . $filename . '.xml');

        foreach ($xml->xpath('//applicationResponse') as $response) {
            $repuesta = $response;
        }

        //AQUI DESCARGAMOS EL ARCHIVO CDR(CONSTANCIA DE RECEPCIÓN)
        $cdr = base64_decode($repuesta);
        $archivo = fopen('../public/xml/' . 'R-' . $filename . '.zip', 'w+');
        fputs($archivo, $cdr);
        fclose($archivo);
        chmod('../public/xml/' . 'R-' . $filename . '.zip', 0777);

        //Eliminamos el Archivo Response
        unlink('../public/xml/' . 'C' . $filename . '.xml');
    }
}
