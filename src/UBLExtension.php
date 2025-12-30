<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class UBLExtension implements XmlSerializable
{
    private XmlSerializable|string|null $content;

    public function __construct(XmlSerializable|string|null $content = null)
    {
        $this->content = $content;
    }

    public function xmlSerialize(Writer $writer): void
    {
        $writer->write([
            [
                'name'  => Schema::EXT . 'UBLExtension',
                'value' => [
                    [
                        'name'  => Schema::EXT . 'ExtensionContent',
                        'value' => $this->content,
                    ],
                ],
            ]
        ]);
    }
}