<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\CountryCoverage\CountryCoverageGetResponse\Data
 *
 * @phpstan-type CountryCoverageGetResponseShape = array{
 *   data?: array<string,DataShape>|null
 * }
 */
final class CountryCoverageGetResponse implements BaseModel
{
    /** @use SdkModel<CountryCoverageGetResponseShape> */
    use SdkModel;

    /** @var array<string,Data>|null $data */
    #[Optional(map: Data::class)]
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
     * @param array<string,DataShape> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param array<string,DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
