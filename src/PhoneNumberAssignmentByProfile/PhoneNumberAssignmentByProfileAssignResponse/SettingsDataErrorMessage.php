<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsDataErrorMessageShape = array{message: string}
 */
final class SettingsDataErrorMessage implements BaseModel
{
    /** @use SdkModel<SettingsDataErrorMessageShape> */
    use SdkModel;

    #[Api]
    public string $message;

    /**
     * `new SettingsDataErrorMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsDataErrorMessage::with(message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingsDataErrorMessage)->withMessage(...)
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
    public static function with(string $message): self
    {
        $obj = new self;

        $obj['message'] = $message;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }
}
