<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Addresses\Actions\ActionValidateResponse\Data;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Result;
use Telnyx\Addresses\Actions\ActionValidateResponse\Data\Suggested;
use Telnyx\APIError;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionValidateResponseShape = array{data?: Data|null}
 */
final class ActionValidateResponse implements BaseModel
{
    /** @use SdkModel<ActionValidateResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   record_type?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   result: value-of<Result>,
     *   suggested: Suggested,
     *   errors?: list<APIError>|null,
     *   record_type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
