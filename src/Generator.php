<?php

namespace NumNum\UBL;

use Sabre\Xml\Service;

class Generator
{
    public static $currencyID;

    public static function invoice(Invoice $invoice, $currencyId = 'EUR', array $customNamespaces = [])
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = array_merge(
            [
                'urn:oasis:names:specification:ubl:schema:xsd:' . $invoice->xmlTagName . '-2' => '',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2'        => 'cbc',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2'    => 'cac',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2'    => 'ext',
            ],
            $customNamespaces
        );

        return $xmlService->write($invoice->xmlTagName, [
            $invoice
        ]);
    }

    public static function creditNote(CreditNote $creditNote, $currencyId = 'EUR', array $customNamespaces = [])
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = array_merge(
            [
                'urn:oasis:names:specification:ubl:schema:xsd:' . $creditNote->xmlTagName . '-2' => '',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2'           => 'cbc',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2'       => 'cac',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2'       => 'ext',
            ],
            $customNamespaces
        );

        return $xmlService->write($creditNote->xmlTagName, [
            $creditNote
        ]);
    }
}
