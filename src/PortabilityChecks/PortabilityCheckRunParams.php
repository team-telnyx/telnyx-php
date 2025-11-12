<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Runs a portability check, returning the results immediately.
 *
 * @see Telnyx\PortabilityChecksService::run()
 *
 * @phpstan-type PortabilityCheckRunParamsShape = array{
 *   phone_numbers?: list<string>
 * }
 */
final class PortabilityCheckRunParams implements BaseModel
{
    /** @use SdkModel<PortabilityCheckRunParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The list of +E.164 formatted phone numbers to check for portability.
     *
     * @var list<string>|null $phone_numbers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phone_numbers
     */
    public static function with(?array $phone_numbers = null): self
    {
        $obj = new self;

        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;

        return $obj;
    }

    /**
     * The list of +E.164 formatted phone numbers to check for portability.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
