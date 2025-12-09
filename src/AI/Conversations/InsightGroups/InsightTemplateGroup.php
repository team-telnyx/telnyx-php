<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightTemplateGroupShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   description?: string|null,
 *   insights?: list<InsightTemplate>|null,
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
     * @param list<InsightTemplate|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   insightType?: value-of<InsightType>|null,
     *   jsonSchema?: mixed|string|null,
     *   name?: string|null,
     *   webhook?: string|null,
     * }> $insights
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $name,
        ?string $description = null,
        ?array $insights = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;

        null !== $description && $obj['description'] = $description;
        null !== $insights && $obj['insights'] = $insights;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * @param list<InsightTemplate|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   insightType?: value-of<InsightType>|null,
     *   jsonSchema?: mixed|string|null,
     *   name?: string|null,
     *   webhook?: string|null,
     * }> $insights
     */
    public function withInsights(array $insights): self
    {
        $obj = clone $this;
        $obj['insights'] = $insights;

        return $obj;
    }

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
