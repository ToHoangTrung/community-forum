<?php


namespace app\model\dto;


class PostDto
{
    private int $id;

    private string $headline;

    private string $contentUrl;

    private \DateTime $createdDate;

    private \DateTime $updatedDate;

    private CatalogDto $catalog;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     */
    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    /**
     * @return string
     */
    public function getContentUrl(): string
    {
        return $this->contentUrl;
    }

    /**
     * @param string $contentUrl
     */
    public function setContentUrl(string $contentUrl): void
    {
        $this->contentUrl = $contentUrl;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate(\DateTime $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate(): \DateTime
    {
        return $this->updatedDate;
    }

    /**
     * @param \DateTime $updatedDate
     */
    public function setUpdatedDate(\DateTime $updatedDate): void
    {
        $this->updatedDate = $updatedDate;
    }

    /**
     * @return CatalogDto
     */
    public function getCatalog(): CatalogDto
    {
        return $this->catalog;
    }

    /**
     * @param CatalogDto $catalog
     */
    public function setCatalog(CatalogDto $catalog): void
    {
        $this->catalog = $catalog;
    }


}