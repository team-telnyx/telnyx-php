<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CountryCoverageShape from \Telnyx\CountryCoverage\CountryCoverage
 *
 * @phpstan-type CountryCoverageGetResponseShape = array{
 *   data?: array<string,CountryCoverage|CountryCoverageShape>|null
 * }
 */
final class CountryCoverageGetResponse implements BaseModel
{
    /** @use SdkModel<CountryCoverageGetResponseShape> */
    use SdkModel;

    /** @var array<string,CountryCoverage>|null $data */
    #[Optional(map: CountryCoverage::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,CountryCoverage|CountryCoverageShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param array<string,CountryCoverage|CountryCoverageShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
