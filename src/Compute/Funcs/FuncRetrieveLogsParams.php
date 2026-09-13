<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Compute\Funcs\FuncRetrieveLogsParams\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns logs oldest first. `type=runtime` (default) returns function stdout/stderr. `type=invocations` returns one platform-generated record per HTTP request served.
 *
 * @see Telnyx\Services\Compute\FuncsService::retrieveLogs()
 *
 * @phpstan-type FuncRetrieveLogsParamsShape = array{
 *   endTime?: \DateTimeInterface|null,
 *   limit?: int|null,
 *   startTime?: \DateTimeInterface|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class FuncRetrieveLogsParams implements BaseModel
{
    /** @use SdkModel<FuncRetrieveLogsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return records at or before this RFC 3339 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $endTime;

    /**
     * Maximum records to return.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Return records at or after this RFC 3339 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $startTime;

    /**
     * Log stream to return.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?\DateTimeInterface $endTime = null,
        ?int $limit = null,
        ?\DateTimeInterface $startTime = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $limit && $self['limit'] = $limit;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Return records at or before this RFC 3339 timestamp.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Maximum records to return.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Return records at or after this RFC 3339 timestamp.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Log stream to return.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
