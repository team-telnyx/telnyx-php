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
 * @see Telnyx\NumbersFeatures->create
 *
 * @phpstan-type numbers_feature_create_params = array{phoneNumbers: list<string>}
 */
final class NumbersFeatureCreateParams implements BaseModel
{
    /** @use SdkModel<numbers_feature_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phoneNumbers */
    #[Api('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new NumbersFeatureCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumbersFeatureCreateParams::with(phoneNumbers: ...)
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
     * @param list<string> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
