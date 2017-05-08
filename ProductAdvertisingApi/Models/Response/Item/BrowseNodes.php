<?php

namespace App\Packages\ProductAdvertisingApi\Models\Response\Item;

class BrowseNodes {

    protected $nodes, $masterCategory, $subCategory;

    public function __construct($xml)
    {
        $this->nodes = [];
        $this->parseBrowseNodes($xml);
    }

    protected function parseBrowseNodes($nodes)
    {
        $output = array();

        $count = 0;
        // Recursively find browse node ids
        if (isset($nodes->BrowseNode)) {
            foreach ($nodes->BrowseNode as $index=>$node) {
                $output[$count][] = [
                    'BrowseNodeId' => (string)$node->BrowseNodeId,
                    'Name' => (string)$node->Name
                ];

                $working = $node;
                while ($working = $working->Ancestors->BrowseNode) {
                    $output[$count][] = [
                        'BrowseNodeId' => (string)$working->BrowseNodeId,
                        'Name' => (string)$working->Name
                    ];
                }

                $count++;
            }
        }

        $this->nodes = $output;
        if (isset($output[0][0])) {
            $this->subCategory = $output[0][0];
        } else {
            $this->subCategory = [
                'BrowseNodeId' => '0',
                'Name' => 'Not Found',
            ];
        }

        if (isset($output[0]) && count($output[0]) > 0) {
//            echo(count($output[0]) - 1);
//            echo("<pre>");
//            print_r($output[0]);

            $this->masterCategory = $output[0][count($output[0])-1];
        } else {
            $this->masterCategory = [
                'BrowseNodeId' => '0',
                'Name' => 'Not Found',
            ];
        }

        return $output;

    }

}