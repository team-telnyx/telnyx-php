<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Addresses\Actions\ActionValidateResponse\Data;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Result;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested;
use Telnyx\APIError;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionValidateResponseShape = array{data?: Data|null}
 */
final class ActionValidateResponse implements BaseModel
{
    /** @use SdkModel<ActionValidateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   result: value-of<Result>,
     *   suggested: Suggested,
     *   errors?: list<APIError>|null,
     *   recordType?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   result: value-of<Result>,
     *   suggested: Suggested,
     *   errors?: list<APIError>|null,
     *   recordType?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
