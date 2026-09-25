<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{memoriesDeleted: int, profileID: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Memories the profile held and no longer does, counted before and after. A report rather than an audit: memory moves in the background between the two counts. The status carries the outcome.
     */
    #[Required('memories_deleted')]
    public int $memoriesDeleted;

    #[Required('profile_id')]
    public string $profileID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(memoriesDeleted: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withMemoriesDeleted(...)->withProfileID(...)
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
    public static function with(int $memoriesDeleted, string $profileID): self
    {
        $self = new self;

        $self['memoriesDeleted'] = $memoriesDeleted;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * Memories the profile held and no longer does, counted before and after. A report rather than an audit: memory moves in the background between the two counts. The status carries the outcome.
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
}
