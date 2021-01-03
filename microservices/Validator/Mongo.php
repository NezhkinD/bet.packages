<?php
namespace BetPackages\Microservices\Validator;

class Mongo
{
    private array $resultsPipeline;

    /**
     * Mongo constructor.
     * @param int $pipelineLimit
     */
    public function __construct(int $pipelineLimit)
    {
        $this->resultsPipeline = [
            [
                //'$sort' => ['$coefficient' => ['$gt' => 0]],
                '$project' => [
                    '_id' => '$_id',
                    'match' => ['$team1', '$team1'],
                    'result1' => ['fonbet', '$exodus', '$coefficient'],
                    'total2' => ['$bk_name', '$bk_exodus', '$bk_coefficient'],
                    'multiply' => [
                        '$multiply' => ['$coefficient', '$bk_coefficient']
                    ],
                    'sum' => [
                        '$sum' => ['$coefficient', '$bk_coefficient']
                    ],
                    'result' => [
                        '$divide' => [
                            [
                                '$multiply' => ['$coefficient', '$bk_coefficient']
                            ],
                            [
                                '$sum' => ['$coefficient', '$bk_coefficient']
                            ]
                        ]
                    ]
                ]
            ], ['$limit' => $pipelineLimit]
        ];
    }

    /**
     * @return array
     */
    public function getResultsPipeline(): array
    {
        return $this->resultsPipeline;
    }
}