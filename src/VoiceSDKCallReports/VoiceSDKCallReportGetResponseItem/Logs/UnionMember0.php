<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\UnionMember0\Level;

/**
 * A raw Voice SDK log entry. Additional SDK-specific fields may be present.
 *
 * @phpstan-type UnionMember0Shape = array{
 *   context?: array<string,mixed>|null,
 *   level?: null|Level|value-of<Level>,
 *   message?: string|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
    use SdkModel;

    /**
     * Raw structured context attached to the log entry.
     *
     * @var array<string,mixed>|null $context
     */
    #[Optional(map: 'mixed')]
    public ?array $context;

    /**
     * Log level emitted by the SDK.
     *
     * @var value-of<Level>|null $level
     */
    #[Optional(enum: Level::class)]
    public ?string $level;

    /**
     * Log message.
     */
    #[Optional]
    public ?string $message;

    /**
     * Time when the log entry was emitted.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $context
     * @param Level|value-of<Level>|null $level
     */
    public static function with(
        ?array $context = null,
        Level|string|null $level = null,
        ?string $message = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $context && $self['context'] = $context;
        null !== $level && $self['level'] = $level;
        null !== $message && $self['message'] = $message;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Raw structured context attached to the log entry.
     *
     * @param array<string,mixed> $context
     */
    public function withContext(array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * Log level emitted by the SDK.
     *
     * @param Level|value-of<Level> $level
     */
    public function withLevel(Level|string $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    /**
     * Log message.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Time when the log entry was emitted.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
