<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type TestProfileDataShape = array{
 *   id?: int|null,
 *   agent?: int|null,
 *   information?: array<string,string>|null,
 *   name?: string|null,
 *   project?: int|null,
 * }
 */
final class TestProfileData implements BaseModel
{
    /** @use SdkModel<TestProfileDataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional(nullable: true)]
    public ?int $agent;

    /** @var array<string,string>|null $information */
    #[Optional(map: 'string', nullable: true)]
    public ?array $information;

    #[Optional]
    public ?string $name;

    #[Optional(nullable: true)]
    public ?int $project;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|array<string,string>|null $information
     */
    public static function with(
        int|Omitted|null $agent = Omitted::VALUE,
        Omitted|array|null $information = Omitted::VALUE,
        int|Omitted|null $project = Omitted::VALUE,
        ?int $id = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        Omitted::VALUE !== $agent && $self['agent'] = $agent;
        Omitted::VALUE !== $information && $self['information'] = $information;
        null !== $name && $self['name'] = $name;
        Omitted::VALUE !== $project && $self['project'] = $project;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    /**
     * @param array<string,string>|null $information
     */
    public function withInformation(?array $information): self
    {
        $self = clone $this;
        $self['information'] = $information;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withProject(?int $project): self
    {
        $self = clone $this;
        $self['project'] = $project;

        return $self;
    }
}
