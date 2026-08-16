<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   occurredAt: \DateTimeInterface,
 *   payload: array<string,mixed>,
 *   seq: int,
 *   type: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /** @var array<string,mixed> $payload */
    #[Required(map: 'mixed')]
    public array $payload;

    #[Required]
    public int $seq;

    #[Required]
    public string $type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(occurredAt: ..., payload: ..., seq: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withOccurredAt(...)->withPayload(...)->withSeq(...)->withType(...)
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
     * @param array<string,mixed> $payload
     */
    public static function with(
        \DateTimeInterface $occurredAt,
        array $payload,
        int $seq,
        string $type
    ): self {
        $self = new self;

        $self['occurredAt'] = $occurredAt;
        $self['payload'] = $payload;
        $self['seq'] = $seq;
        $self['type'] = $type;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * @param array<string,mixed> $payload
     */
    public function withPayload(array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    public function withSeq(int $seq): self
    {
        $self = clone $this;
        $self['seq'] = $seq;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
