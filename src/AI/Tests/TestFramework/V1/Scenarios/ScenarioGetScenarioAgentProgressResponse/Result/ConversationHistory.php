<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationHistoryShape = array{
 *   content?: string|null, role?: string|null, timestamp?: string|null
 * }
 */
final class ConversationHistory implements BaseModel
{
    /** @use SdkModel<ConversationHistoryShape> */
    use SdkModel;

    #[Optional]
    public ?string $content;

    #[Optional]
    public ?string $role;

    #[Optional]
    public ?string $timestamp;

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
        ?string $content = null,
        ?string $role = null,
        ?string $timestamp = null
    ): self {
        $self = new self;

        null !== $content && $self['content'] = $content;
        null !== $role && $self['role'] = $role;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withRole(string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
