<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type RunShape = array{
 *   id?: int|null,
 *   inboundNumber?: string|null,
 *   number?: string|null,
 *   scenario?: int|null,
 *   scenarioName?: string|null,
 *   status?: string|null,
 * }
 */
final class Run implements BaseModel
{
    /** @use SdkModel<RunShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional('inbound_number', nullable: true)]
    public ?string $inboundNumber;

    #[Optional(nullable: true)]
    public ?string $number;

    #[Optional]
    public ?int $scenario;

    #[Optional('scenario_name')]
    public ?string $scenarioName;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string|Omitted|null $inboundNumber = Omitted::VALUE,
        string|Omitted|null $number = Omitted::VALUE,
        ?int $id = null,
        ?int $scenario = null,
        ?string $scenarioName = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        Omitted::VALUE !== $inboundNumber && $self['inboundNumber'] = $inboundNumber;
        Omitted::VALUE !== $number && $self['number'] = $number;
        null !== $scenario && $self['scenario'] = $scenario;
        null !== $scenarioName && $self['scenarioName'] = $scenarioName;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withInboundNumber(?string $inboundNumber): self
    {
        $self = clone $this;
        $self['inboundNumber'] = $inboundNumber;

        return $self;
    }

    public function withNumber(?string $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }

    public function withScenario(int $scenario): self
    {
        $self = clone $this;
        $self['scenario'] = $scenario;

        return $self;
    }

    public function withScenarioName(string $scenarioName): self
    {
        $self = clone $this;
        $self['scenarioName'] = $scenarioName;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
