<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   derivedFrom: list<string>|null,
 *   sourceID: string|null,
 *   text: string,
 *   recordedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * The ids of the memories this one was derived from. Read each with `GET .../memories/{memory_id}` to reach its `source_id`. Set for a derived memory; null for a fact.
     *
     * @var list<string>|null $derivedFrom
     */
    #[Required('derived_from', list: 'string')]
    public ?array $derivedFrom;

    /**
     * The source this memory was extracted from. Set for a fact, which comes from exactly one source; null for a memory derived from other memories. Read it with `GET .../sources/{source_id}`. A source deleted a moment ago can still be named here, and then answers 404.
     */
    #[Required('source_id')]
    public ?string $sourceID;

    #[Required]
    public string $text;

    #[Optional('recorded_at', nullable: true)]
    public ?string $recordedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., derivedFrom: ..., sourceID: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withDerivedFrom(...)->withSourceID(...)->withText(...)
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
     * @param list<string>|null $derivedFrom
     */
    public static function with(
        string $id,
        ?array $derivedFrom,
        ?string $sourceID,
        string $text,
        string|Omitted|null $recordedAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['derivedFrom'] = $derivedFrom;
        $self['sourceID'] = $sourceID;
        $self['text'] = $text;

        Omitted::VALUE !== $recordedAt && $self['recordedAt'] = $recordedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The ids of the memories this one was derived from. Read each with `GET .../memories/{memory_id}` to reach its `source_id`. Set for a derived memory; null for a fact.
     *
     * @param list<string>|null $derivedFrom
     */
    public function withDerivedFrom(?array $derivedFrom): self
    {
        $self = clone $this;
        $self['derivedFrom'] = $derivedFrom;

        return $self;
    }

    /**
     * The source this memory was extracted from. Set for a fact, which comes from exactly one source; null for a memory derived from other memories. Read it with `GET .../sources/{source_id}`. A source deleted a moment ago can still be named here, and then answers 404.
     */
    public function withSourceID(?string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

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
}
