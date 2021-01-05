<?php
namespace BetPackages\Microservices\NosqlDatabaseClusterMicroservice\Enum;


class MongoCollectionsEnum
{
    public const TEAM_STANDARDIZER_COLLECTION = "team-standardizer";


    private string $collectionName;

    /**
     * @return string
     */
    public function getCollectionName(): string
    {
        return $this->collectionName;
    }

    /**
     * @param string $collectionName
     * @return MongoCollectionsEnum
     */
    public function setCollectionName(string $collectionName): MongoCollectionsEnum
    {
        $this->collectionName = $collectionName;
        return $this;
    }
}