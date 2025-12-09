<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Runs a portability check, returning the results immediately.
 *
 * @see Telnyx\Services\PortabilityChecksService::run()
 *
 * @phpstan-type PortabilityCheckRunParamsShape = array{
 *   phoneNumbers?: list<string>
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
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(?array $phoneNumbers = null): self
    {
        $obj = new self;

        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;

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
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
