<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceCommandResultShape = array{result: string}
 */
final class ConferenceCommandResult implements BaseModel
{
    /** @use SdkModel<ConferenceCommandResultShape> */
    use SdkModel;

    #[Required]
    public string $result;

    /**
     * `new ConferenceCommandResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceCommandResult::with(result: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceCommandResult)->withResult(...)
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
    public static function with(string $result): self
    {
        $self = new self;

        $self['result'] = $result;

        return $self;
    }

    public function withResult(string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
