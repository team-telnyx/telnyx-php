<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InsightTemplateShape from \Telnyx\AI\Conversations\Insights\InsightTemplate
 *
 * @phpstan-type InsightTemplateGroupShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   description?: string|null,
 *   insights?: list<InsightTemplateShape>|null,
 *   webhook?: string|null,
 * }
 */
final class InsightTemplateGroup implements BaseModel
{
    /** @use SdkModel<InsightTemplateGroupShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $description;

    /** @var list<InsightTemplate>|null $insights */
    #[Optional(list: InsightTemplate::class)]
    public ?array $insights;

    #[Optional]
    public ?string $webhook;

    /**
     * `new InsightTemplateGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplateGroup::with(id: ..., createdAt: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplateGroup)->withID(...)->withCreatedAt(...)->withName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<InsightTemplateShape> $insights
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $name,
        ?string $description = null,
        ?array $insights = null,
        ?string $webhook = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $insights && $self['insights'] = $insights;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param list<InsightTemplateShape> $insights
     */
    public function withInsights(array $insights): self
    {
        $self = clone $this;
        $self['insights'] = $insights;

        return $self;
    }

    public function withWebhook(string $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
