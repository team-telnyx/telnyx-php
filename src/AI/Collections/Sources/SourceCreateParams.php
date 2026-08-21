<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Attaches a new content source to the specified collection and returns the created source. The source's content is ingested and embedded so it becomes searchable within the collection.
 *
 * @see Telnyx\Services\AI\Collections\SourcesService::create()
 *
 * @phpstan-type SourceCreateParamsShape = array{
 *   sourceType: SourceType|value-of<SourceType>, bucketID?: string|null
 * }
 */
final class SourceCreateParams implements BaseModel
{
    /** @use SdkModel<SourceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
     *
     * @var value-of<SourceType> $sourceType
     */
    #[Required('source_type', enum: SourceType::class)]
    public string $sourceType;

    /**
     * The Telnyx Storage bucket name. Required when `source_type` is `bucket`; ignored otherwise.
     */
    #[Optional('bucket_id')]
    public ?string $bucketID;

    /**
     * `new SourceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCreateParams::with(sourceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCreateParams)->withSourceType(...)
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
     * @param SourceType|value-of<SourceType> $sourceType
     */
    public static function with(
        SourceType|string $sourceType,
        ?string $bucketID = null
    ): self {
        $self = new self;

        $self['sourceType'] = $sourceType;

        null !== $bucketID && $self['bucketID'] = $bucketID;

        return $self;
    }

    /**
     * The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
     *
     * @param SourceType|value-of<SourceType> $sourceType
     */
    public function withSourceType(SourceType|string $sourceType): self
    {
        $self = clone $this;
        $self['sourceType'] = $sourceType;

        return $self;
    }

    /**
     * The Telnyx Storage bucket name. Required when `source_type` is `bucket`; ignored otherwise.
     */
    public function withBucketID(string $bucketID): self
    {
        $self = clone $this;
        $self['bucketID'] = $bucketID;

        return $self;
    }
}
