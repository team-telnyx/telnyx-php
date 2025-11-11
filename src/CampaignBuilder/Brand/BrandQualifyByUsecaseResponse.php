<?php

declare(strict_types=1);

namespace Telnyx\CampaignBuilder\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type BrandQualifyByUsecaseResponseShape = array{
 *   annualFee?: float|null,
 *   maxSubUsecases?: int|null,
 *   minSubUsecases?: int|null,
 *   mnoMetadata?: array<string,mixed>|null,
 *   monthlyFee?: float|null,
 *   quarterlyFee?: float|null,
 *   usecase?: string|null,
 * }
 */
final class BrandQualifyByUsecaseResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BrandQualifyByUsecaseResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Campaign annual subscription fee.
     */
    #[Api(optional: true)]
    public ?float $annualFee;

    /**
     * Maximum number of sub-usecases declaration required.
     */
    #[Api(optional: true)]
    public ?int $maxSubUsecases;

    /**
     * Minimum number of sub-usecases declaration required.
     */
    #[Api(optional: true)]
    public ?int $minSubUsecases;

    /**
     * Map of usecase metadata for each MNO. Key is the network ID of the MNO (e.g. 10017), Value is the mno metadata for the usecase.
     *
     * @var array<string,mixed>|null $mnoMetadata
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $mnoMetadata;

    /**
     * Campaign monthly subscription fee.
     */
    #[Api(optional: true)]
    public ?float $monthlyFee;

    /**
     * Campaign quarterly subscription fee.
     */
    #[Api(optional: true)]
    public ?float $quarterlyFee;

    /**
     * Campaign usecase.
     */
    #[Api(optional: true)]
    public ?string $usecase;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $mnoMetadata
     */
    public static function with(
        ?float $annualFee = null,
        ?int $maxSubUsecases = null,
        ?int $minSubUsecases = null,
        ?array $mnoMetadata = null,
        ?float $monthlyFee = null,
        ?float $quarterlyFee = null,
        ?string $usecase = null,
    ): self {
        $obj = new self;

        null !== $annualFee && $obj->annualFee = $annualFee;
        null !== $maxSubUsecases && $obj->maxSubUsecases = $maxSubUsecases;
        null !== $minSubUsecases && $obj->minSubUsecases = $minSubUsecases;
        null !== $mnoMetadata && $obj->mnoMetadata = $mnoMetadata;
        null !== $monthlyFee && $obj->monthlyFee = $monthlyFee;
        null !== $quarterlyFee && $obj->quarterlyFee = $quarterlyFee;
        null !== $usecase && $obj->usecase = $usecase;

        return $obj;
    }

    /**
     * Campaign annual subscription fee.
     */
    public function withAnnualFee(float $annualFee): self
    {
        $obj = clone $this;
        $obj->annualFee = $annualFee;

        return $obj;
    }

    /**
     * Maximum number of sub-usecases declaration required.
     */
    public function withMaxSubUsecases(int $maxSubUsecases): self
    {
        $obj = clone $this;
        $obj->maxSubUsecases = $maxSubUsecases;

        return $obj;
    }

    /**
     * Minimum number of sub-usecases declaration required.
     */
    public function withMinSubUsecases(int $minSubUsecases): self
    {
        $obj = clone $this;
        $obj->minSubUsecases = $minSubUsecases;

        return $obj;
    }

    /**
     * Map of usecase metadata for each MNO. Key is the network ID of the MNO (e.g. 10017), Value is the mno metadata for the usecase.
     *
     * @param array<string,mixed> $mnoMetadata
     */
    public function withMnoMetadata(array $mnoMetadata): self
    {
        $obj = clone $this;
        $obj->mnoMetadata = $mnoMetadata;

        return $obj;
    }

    /**
     * Campaign monthly subscription fee.
     */
    public function withMonthlyFee(float $monthlyFee): self
    {
        $obj = clone $this;
        $obj->monthlyFee = $monthlyFee;

        return $obj;
    }

    /**
     * Campaign quarterly subscription fee.
     */
    public function withQuarterlyFee(float $quarterlyFee): self
    {
        $obj = clone $this;
        $obj->quarterlyFee = $quarterlyFee;

        return $obj;
    }

    /**
     * Campaign usecase.
     */
    public function withUsecase(string $usecase): self
    {
        $obj = clone $this;
        $obj->usecase = $usecase;

        return $obj;
    }
}
