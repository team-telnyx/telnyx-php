<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortabilityCheckRunParams); // set properties as needed
 * $client->portabilityChecks->run(...$params->toArray());
 * ```
 * Runs a portability check, returning the results immediately.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portabilityChecks->run(...$params->toArray());`
 *
 * @see Telnyx\PortabilityChecks->run
 *
 * @phpstan-type portability_check_run_params = array{phoneNumbers?: list<string>}
 */
final class PortabilityCheckRunParams implements BaseModel
{
    /** @use SdkModel<portability_check_run_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The list of +E.164 formatted phone numbers to check for portability.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string', optional: true)]
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

        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;

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
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
