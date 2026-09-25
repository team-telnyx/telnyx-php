<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   memoriesDeleted: int, profileID: string, sourceID: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Memories the profile held and no longer does, counted before and after across the whole profile: it includes memories derived from this source together with others, and anything else the profile lost in between. A report rather than an audit. The status carries the outcome.
     */
    #[Required('memories_deleted')]
    public int $memoriesDeleted;

    #[Required('profile_id')]
    public string $profileID;

    /**
     * Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     */
    #[Required('source_id')]
    public string $sourceID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(memoriesDeleted: ..., profileID: ..., sourceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withMemoriesDeleted(...)->withProfileID(...)->withSourceID(...)
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
        int $memoriesDeleted,
        string $profileID,
        string $sourceID
    ): self {
        $self = new self;

        $self['memoriesDeleted'] = $memoriesDeleted;
        $self['profileID'] = $profileID;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Memories the profile held and no longer does, counted before and after across the whole profile: it includes memories derived from this source together with others, and anything else the profile lost in between. A report rather than an audit. The status carries the outcome.
     */
    public function withMemoriesDeleted(int $memoriesDeleted): self
    {
        $self = clone $this;
        $self['memoriesDeleted'] = $memoriesDeleted;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }
}
