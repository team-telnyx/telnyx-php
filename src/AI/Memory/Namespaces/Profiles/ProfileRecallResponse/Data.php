<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   id: string, text: string, recordedAt?: string|null, score?: float|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $text;

    #[Optional('recorded_at', nullable: true)]
    public ?string $recordedAt;

    /**
     * Relevance, 0-1. Null where the deployment's reranker is a passthrough; results are in rank order either way.
     */
    #[Optional(nullable: true)]
    public ?float $score;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withText(...)
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
     */
    public static function with(
        string $id,
        string $text,
        string|Omitted|null $recordedAt = Omitted::VALUE,
        float|Omitted|null $score = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['text'] = $text;

        Omitted::VALUE !== $recordedAt && $self['recordedAt'] = $recordedAt;
        Omitted::VALUE !== $score && $self['score'] = $score;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withRecordedAt(?string $recordedAt): self
    {
        $self = clone $this;
        $self['recordedAt'] = $recordedAt;

        return $self;
    }

    /**
     * Relevance, 0-1. Null where the deployment's reranker is a passthrough; results are in rank order either way.
     */
    public function withScore(?float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }
}
