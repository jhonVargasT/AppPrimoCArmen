<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function boletasElectronicas()
    {
        $xml = new drmad\semeele\Document('html');
        $xml->child('head')
            ->add('title', 'An XHTML')
            ->add('meta', ['charset' => 'utf-8'])
            ->parent()
            ->child('body')
            ->add('h1', 'An XHTML')
            ->add('p', 'This is a XML-valid HTML. Yay!')
        ;
        echo $xml->getXML();
    }

    public function factura_xml($factura_id, $request, $moneda, $instancia)
    {
        $factura = DocumentoPorPagar::findOrFail($factura_id);

        $funciones = new funciones();

        $carts = Cart::instance($instancia)->content();

        $count = 1;

        foreach ($carts as $carro) {
            $invoice_line[$count] = '
                       <cac:InvoiceLine>
                          <cbc:ID>' . $count . '</cbc:ID>
                          <cbc:InvoicedQuantity unitCode="NIU">' . number_format((float)$carro->options->cantidad, 2, '.', '') . '</cbc:InvoicedQuantity>
                          <cbc:LineExtensionAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)($carro->options->impt_det - ($carro->options->impt_det * 0.18)), 2, '.', '') . '</cbc:LineExtensionAmount>
                          <cac:PricingReference>
                             <cac:AlternativeConditionPrice>
                                <cbc:PriceAmount currencyID="' . $moneda->codsunat . '">' . $carro->options->impt_det . '</cbc:PriceAmount>
                                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
                             </cac:AlternativeConditionPrice>
                          </cac:PricingReference>
                          <cac:TaxTotal>
                             <cbc:TaxAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)$carro->options->impt_det * 0.18, 2, '.', '') . '</cbc:TaxAmount>
                             <cac:TaxSubtotal>
                                <cbc:TaxAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)$carro->options->impt_det * 0.18, 2, '.', '') . '</cbc:TaxAmount>
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
                             <cbc:Description>' . $carro->options->prdto_descripcion . '</cbc:Description>
                             <cac:SellersItemIdentification>
                                <cbc:ID>' . $carro->options->producto_id . '</cbc:ID>
                             </cac:SellersItemIdentification>
                          </cac:Item>
                          <cac:Price>
                             <cbc:PriceAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)$carro->options->prec_unit, 2, '.', '') . '</cbc:PriceAmount>
                          </cac:Price>
                       </cac:InvoiceLine>';
            $count++;
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ccts="urn:un:unece:uncefact:documentation:2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" xmlns:sac="urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1" xmlns:udt="urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                   <ext:UBLExtensions>
                      <ext:UBLExtension>
                         <ext:ExtensionContent>
                            <sac:AdditionalInformation>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1001</cbc:ID>
                                  <cbc:PayableAmount currencyID="' . $moneda->codsunat . '">' . $factura->base . '</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                                <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1002</cbc:ID>
                                  <cbc:PayableAmount currencyID="' . $moneda->codsunat . '">0.00</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalMonetaryTotal>
                                  <cbc:ID>1004</cbc:ID>
                                  <cbc:PayableAmount currencyID="' . $moneda->codsunat . '">0.00</cbc:PayableAmount>
                               </sac:AdditionalMonetaryTotal>
                               <sac:AdditionalProperty>
                                  <cbc:ID>1000</cbc:ID>
                                  <cbc:Value>' . NumeroALetras::convertir($request->txttotal) . '</cbc:Value>
                               </sac:AdditionalProperty>
                            </sac:AdditionalInformation>
                         </ext:ExtensionContent>
                      </ext:UBLExtension>
                      <ext:UBLExtension>
                         <ext:ExtensionContent>
                         </ext:ExtensionContent>
                      </ext:UBLExtension>
                   </ext:UBLExtensions>
                   <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
                   <cbc:CustomizationID>1.0</cbc:CustomizationID>
                   <cbc:ID>F' . $factura->seriedoc . '-' . $factura->numerodoc . '</cbc:ID>
                   <cbc:IssueDate>' . $factura->fechaproceso . '</cbc:IssueDate>
                   <cbc:InvoiceTypeCode>01</cbc:InvoiceTypeCode>
                   <cbc:DocumentCurrencyCode>' . $moneda->codsunat . '</cbc:DocumentCurrencyCode>
                   <cac:Signature>
                      <cbc:ID>F' . $factura->seriedoc . '-' . $factura->numerodoc . '</cbc:ID>
                      <cac:SignatoryParty>
                         <cac:PartyIdentification>
                            <cbc:ID>' . $funciones->muestra_ruc_session() . '</cbc:ID>
                         </cac:PartyIdentification>
                         <cac:PartyName>
                            <cbc:Name>' . $funciones->cliente_descripcion_session() . '</cbc:Name>
                         </cac:PartyName>
                      </cac:SignatoryParty>
                      <cac:DigitalSignatureAttachment>
                         <cac:ExternalReference>
                            <cbc:URI>#F' . $factura->seriedoc . '-' . $factura->numerodoc . '</cbc:URI>
                         </cac:ExternalReference>
                      </cac:DigitalSignatureAttachment>
                   </cac:Signature>
                   <cac:AccountingSupplierParty>
                      <cbc:CustomerAssignedAccountID>' . $funciones->muestra_ruc_session() . '</cbc:CustomerAssignedAccountID>
                      <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
                      <cac:Party>
                         <cac:PostalAddress>
                            <cbc:ID></cbc:ID>
                            <cbc:StreetName></cbc:StreetName>
                            <cbc:CitySubdivisionName></cbc:CitySubdivisionName>
                            <cbc:CityName></cbc:CityName>
                            <cbc:CountrySubentity></cbc:CountrySubentity>
                            <cbc:District></cbc:District>
                            <cac:Country>
                               <cbc:IdentificationCode></cbc:IdentificationCode>
                            </cac:Country>
                         </cac:PostalAddress>
                         <cac:PartyLegalEntity>
                            <cbc:RegistrationName>' . $funciones->cliente_descripcion_session() . '</cbc:RegistrationName>
                         </cac:PartyLegalEntity>
                      </cac:Party>
                   </cac:AccountingSupplierParty>
                   <cac:AccountingCustomerParty>
                      <cbc:CustomerAssignedAccountID>' . $factura->ruc . '</cbc:CustomerAssignedAccountID>
                      <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
                      <cac:Party>
                         <cac:PartyLegalEntity>
                            <cbc:RegistrationName>' . $factura->razonsocial . '</cbc:RegistrationName>
                            <cac:RegistrationAddress>
                                <cbc:StreetName>' . $factura->direccion . '</cbc:StreetName>
                            </cac:RegistrationAddress>
                         </cac:PartyLegalEntity>
                      </cac:Party>
                   </cac:AccountingCustomerParty>
                   <cac:TaxTotal>
                      <cbc:TaxAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)($factura->base * 0.18), 2, '.', '') . '</cbc:TaxAmount>
                      <cac:TaxSubtotal>
                         <cbc:TaxAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)($factura->base * 0.18), 2, '.', '') . '</cbc:TaxAmount>
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
                      <cbc:PayableAmount currencyID="' . $moneda->codsunat . '">' . number_format((float)$request->txttotal, 2, '.', '') . '</cbc:PayableAmount>
                   </cac:LegalMonetaryTotal>';
        for ($i = 1; $i <= count($invoice_line); $i++) {
            $xml .= $invoice_line[$i];
        }

        $xml .= '</Invoice>';

        $filename = 'F' . $factura->seriedoc . '-' . $factura->numerodoc;

        $exists = Storage::disk('xml')->exists($filename . '.xml');

        if ($exists == false) {
            File::put(public_path('xml/' . $filename . '.xml'), $xml);

            $this->firmar_documento($filename);

            //$this->comprimir_factura($filename);

            //$this->consumo_soap($filename);
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
        $objKey->passphrase = 'fsLs9hNpsvzuprcn';

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
        <wsse:Username>20482684557MODDATOS</wsse:Username>
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
