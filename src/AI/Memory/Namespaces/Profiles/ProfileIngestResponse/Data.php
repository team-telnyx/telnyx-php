<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   operationID: string, profileID: string, sessionID: string, sourceID: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('operation_id')]
    public string $operationID;

    #[Required('profile_id')]
    public string $profileID;

    #[Required('session_id')]
    public string $sessionID;

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
     * Data::with(operationID: ..., profileID: ..., sessionID: ..., sourceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withOperationID(...)
     *   ->withProfileID(...)
     *   ->withSessionID(...)
     *   ->withSourceID(...)
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
        string $operationID,
        string $profileID,
        string $sessionID,
        string $sourceID
    ): self {
        $self = new self;

        $self['operationID'] = $operationID;
        $self['profileID'] = $profileID;
        $self['sessionID'] = $sessionID;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    public function withOperationID(string $operationID): self
    {
        $self = clone $this;
        $self['operationID'] = $operationID;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

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
