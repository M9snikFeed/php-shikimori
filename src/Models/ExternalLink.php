<?php

namespace M9snikfeed\PhpShikimori\Models;

class ExternalLink
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var string
     */
    private string $kind;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $source;

    /**
     * @var int
     */
    private int $entry_id;

    /**
     * @var string
     */
    private string $entry_type;

    /**
     * @var string|null
     */
    private ?string $created_at;

    /**
     * @var string|null
     */
    private ?string $updated_at;

    /**
     * @var string|null
     */
    private ?string $imported_at;

    /**
     * @param object $link
     */
    public function __construct(object $link)
    {
        $this->source = $link->source;
        $this->id = $link->id;
        $this->url = $link->url;
        $this->kind = $link->kind;
        $this->created_at = $link->created_at;
        $this->updated_at = $link->updated_at;
        $this->imported_at = $link->imported_at;
        $this->entry_id = $link->entry_id;
        $this->entry_type = $link->entry_type;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return int
     */
    public function getEntryId(): int
    {
        return $this->entry_id;
    }

    /**
     * @return string
     */
    public function getEntryType(): string
    {
        return $this->entry_type;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @return string|null
     */
    public function getImportedAt(): ?string
    {
        return $this->imported_at;
    }
}