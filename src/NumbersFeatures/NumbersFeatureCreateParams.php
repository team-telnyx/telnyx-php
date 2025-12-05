<?php

declare(strict_types=1);

namespace Telnyx\NumbersFeatures;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve the features for a list of numbers.
 *
 * @see Telnyx\Services\NumbersFeaturesService::create()
 *
 * @phpstan-type NumbersFeatureCreateParamsShape = array{
 *   phone_numbers: list<string>
 * }
 */
final class NumbersFeatureCreateParams implements BaseModel
{
    /** @use SdkModel<NumbersFeatureCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phone_numbers */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * `new NumbersFeatureCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumbersFeatureCreateParams::with(phone_numbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumbersFeatureCreateParams)->withPhoneNumbers(...)
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
     *
     * @param list<string> $phone_numbers
     */
    public static function with(array $phone_numbers): self
    {
        $obj = new self;

        $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
