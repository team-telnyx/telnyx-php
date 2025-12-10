<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\CampaignBuilder\Brand;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
final class BrandQualifyByUsecaseResponse implements BaseModel
{
    /** @use SdkModel<BrandQualifyByUsecaseResponseShape> */
    use SdkModel;

    /**
     * Campaign annual subscription fee.
     */
    #[Optional]
    public ?float $annualFee;

    /**
     * Maximum number of sub-usecases declaration required.
     */
    #[Optional]
    public ?int $maxSubUsecases;

    /**
     * Minimum number of sub-usecases declaration required.
     */
    #[Optional]
    public ?int $minSubUsecases;

    /**
     * Map of usecase metadata for each MNO. Key is the network ID of the MNO (e.g. 10017), Value is the mno metadata for the usecase.
     *
     * @var array<string,mixed>|null $mnoMetadata
     */
    #[Optional(map: 'mixed')]
    public ?array $mnoMetadata;

    /**
     * Campaign monthly subscription fee.
     */
    #[Optional]
    public ?float $monthlyFee;

    /**
     * Campaign quarterly subscription fee.
     */
    #[Optional]
    public ?float $quarterlyFee;

    /**
     * Campaign usecase.
     */
    #[Optional]
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
        $self = new self;

        null !== $annualFee && $self['annualFee'] = $annualFee;
        null !== $maxSubUsecases && $self['maxSubUsecases'] = $maxSubUsecases;
        null !== $minSubUsecases && $self['minSubUsecases'] = $minSubUsecases;
        null !== $mnoMetadata && $self['mnoMetadata'] = $mnoMetadata;
        null !== $monthlyFee && $self['monthlyFee'] = $monthlyFee;
        null !== $quarterlyFee && $self['quarterlyFee'] = $quarterlyFee;
        null !== $usecase && $self['usecase'] = $usecase;

        return $self;
    }

    /**
     * Campaign annual subscription fee.
     */
    public function withAnnualFee(float $annualFee): self
    {
        $self = clone $this;
        $self['annualFee'] = $annualFee;

        return $self;
    }

    /**
     * Maximum number of sub-usecases declaration required.
     */
    public function withMaxSubUsecases(int $maxSubUsecases): self
    {
        $self = clone $this;
        $self['maxSubUsecases'] = $maxSubUsecases;

        return $self;
    }

    /**
     * Minimum number of sub-usecases declaration required.
     */
    public function withMinSubUsecases(int $minSubUsecases): self
    {
        $self = clone $this;
        $self['minSubUsecases'] = $minSubUsecases;

        return $self;
    }

    /**
     * Map of usecase metadata for each MNO. Key is the network ID of the MNO (e.g. 10017), Value is the mno metadata for the usecase.
     *
     * @param array<string,mixed> $mnoMetadata
     */
    public function withMnoMetadata(array $mnoMetadata): self
    {
        $self = clone $this;
        $self['mnoMetadata'] = $mnoMetadata;

        return $self;
    }

    /**
     * Campaign monthly subscription fee.
     */
    public function withMonthlyFee(float $monthlyFee): self
    {
        $self = clone $this;
        $self['monthlyFee'] = $monthlyFee;

        return $self;
    }

    /**
     * Campaign quarterly subscription fee.
     */
    public function withQuarterlyFee(float $quarterlyFee): self
    {
        $self = clone $this;
        $self['quarterlyFee'] = $quarterlyFee;

        return $self;
    }

    /**
     * Campaign usecase.
     */
    public function withUsecase(string $usecase): self
    {
        $self = clone $this;
        $self['usecase'] = $usecase;

        return $self;
    }
}
