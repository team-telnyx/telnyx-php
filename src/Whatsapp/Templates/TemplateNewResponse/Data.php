<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateNewResponse\Data\Category;
use Telnyx\Whatsapp\Templates\TemplateNewResponse\Data\WhatsappBusinessAccount;

/**
 * @phpstan-import-type WhatsappBusinessAccountShape from \Telnyx\Whatsapp\Templates\TemplateNewResponse\Data\WhatsappBusinessAccount
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   category?: null|Category|value-of<Category>,
 *   components?: list<mixed>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   language?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   rejectionReason?: string|null,
 *   status?: string|null,
 *   templateID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   whatsappBusinessAccount?: null|WhatsappBusinessAccount|WhatsappBusinessAccountShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /** @var value-of<Category>|null $category */
    #[Optional(enum: Category::class)]
    public ?string $category;

    /**
     * Whatsapp template components (header, body, footer, buttons).
     *
     * @var list<mixed>|null $components
     */
    #[Optional(list: 'mixed')]
    public ?array $components;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $name;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('rejection_reason')]
    public ?string $rejectionReason;

    #[Optional]
    public ?string $status;

    #[Optional('template_id')]
    public ?string $templateID;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('whatsapp_business_account')]
    public ?WhatsappBusinessAccount $whatsappBusinessAccount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Category|value-of<Category>|null $category
     * @param list<mixed>|null $components
     * @param WhatsappBusinessAccount|WhatsappBusinessAccountShape|null $whatsappBusinessAccount
     */
    public static function with(
        ?string $id = null,
        Category|string|null $category = null,
        ?array $components = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $language = null,
        ?string $name = null,
        ?string $recordType = null,
        ?string $rejectionReason = null,
        ?string $status = null,
        ?string $templateID = null,
        ?\DateTimeInterface $updatedAt = null,
        WhatsappBusinessAccount|array|null $whatsappBusinessAccount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $category && $self['category'] = $category;
        null !== $components && $self['components'] = $components;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $rejectionReason && $self['rejectionReason'] = $rejectionReason;
        null !== $status && $self['status'] = $status;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $whatsappBusinessAccount && $self['whatsappBusinessAccount'] = $whatsappBusinessAccount;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Whatsapp template components (header, body, footer, buttons).
     *
     * @param list<mixed> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRejectionReason(string $rejectionReason): self
    {
        $self = clone $this;
        $self['rejectionReason'] = $rejectionReason;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param WhatsappBusinessAccount|WhatsappBusinessAccountShape $whatsappBusinessAccount
     */
    public function withWhatsappBusinessAccount(
        WhatsappBusinessAccount|array $whatsappBusinessAccount
    ): self {
        $self = clone $this;
        $self['whatsappBusinessAccount'] = $whatsappBusinessAccount;

        return $self;
    }
}
