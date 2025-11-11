<?php

declare(strict_types=1);

namespace Telnyx\NumbersFeatures\NumbersFeatureNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{features: list<string>, phone_number: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<string> $features */
    #[Api(list: 'string')]
    public array $features;

    #[Api]
    public string $phone_number;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(features: ..., phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withFeatures(...)->withPhoneNumber(...)
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
     * @param list<string> $features
     */
    public static function with(array $features, string $phone_number): self
    {
        $obj = new self;

        $obj->features = $features;
        $obj->phone_number = $phone_number;

        return $obj;
    }

    /**
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj->features = $features;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
