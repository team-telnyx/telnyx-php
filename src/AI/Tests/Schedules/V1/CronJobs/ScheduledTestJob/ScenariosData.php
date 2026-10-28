<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type ScenariosDataShape = array{
 *   id?: int|null,
 *   agent?: int|null,
 *   name?: string|null,
 *   personality?: int|null,
 *   personalityName?: string|null,
 * }
 */
final class ScenariosData implements BaseModel
{
    /** @use SdkModel<ScenariosDataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $agent;

    #[Optional]
    public ?string $name;

    #[Optional(nullable: true)]
    public ?int $personality;

    #[Optional('personality_name')]
    public ?string $personalityName;

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
        int|Omitted|null $personality = Omitted::VALUE,
        ?int $id = null,
        ?int $agent = null,
        ?string $name = null,
        ?string $personalityName = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $agent && $self['agent'] = $agent;
        null !== $name && $self['name'] = $name;
        Omitted::VALUE !== $personality && $self['personality'] = $personality;
        null !== $personalityName && $self['personalityName'] = $personalityName;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAgent(int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPersonality(?int $personality): self
    {
        $self = clone $this;
        $self['personality'] = $personality;

        return $self;
    }

    public function withPersonalityName(string $personalityName): self
    {
        $self = clone $this;
        $self['personalityName'] = $personalityName;

        return $self;
    }
}
