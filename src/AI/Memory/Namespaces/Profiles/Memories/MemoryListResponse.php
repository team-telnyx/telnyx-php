<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Memories;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type MemoryListResponseShape = array{
 *   id: string, sourceID: string|null, text: string, recordedAt?: string|null
 * }
 */
final class MemoryListResponse implements BaseModel
{
    /** @use SdkModel<MemoryListResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

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
     * `new MemoryListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MemoryListResponse::with(id: ..., sourceID: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MemoryListResponse)->withID(...)->withSourceID(...)->withText(...)
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
        ?string $sourceID,
        string $text,
        string|Omitted|null $recordedAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
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
