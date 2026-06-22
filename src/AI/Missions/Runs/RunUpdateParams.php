<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update run status and/or result.
 *
 * @see Telnyx\Services\AI\Missions\RunsService::update()
 *
 * @phpstan-type RunUpdateParamsShape = array{
 *   missionID: string,
 *   error?: string|null,
 *   metadata?: array<string,mixed>|null,
 *   resultPayload?: array<string,mixed>|null,
 *   resultSummary?: string|null,
 *   status?: null|RunStatus|value-of<RunStatus>,
 * }
 */
final class RunUpdateParams implements BaseModel
{
    /** @use SdkModel<RunUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Optional]
    public ?string $error;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /** @var array<string,mixed>|null $resultPayload */
    #[Optional('result_payload', map: 'mixed')]
    public ?array $resultPayload;

    #[Optional('result_summary')]
    public ?string $resultSummary;

    /** @var value-of<RunStatus>|null $status */
    #[Optional(enum: RunStatus::class)]
    public ?string $status;

    /**
     * `new RunUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunUpdateParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RunUpdateParams)->withMissionID(...)
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
     * @param array<string,mixed>|null $metadata
     * @param array<string,mixed>|null $resultPayload
     * @param RunStatus|value-of<RunStatus>|null $status
     */
    public static function with(
        string $missionID,
        ?string $error = null,
        ?array $metadata = null,
        ?array $resultPayload = null,
        ?string $resultSummary = null,
        RunStatus|string|null $status = null,
    ): self {
        $self = new self;

        $self['missionID'] = $missionID;

        null !== $error && $self['error'] = $error;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $resultPayload && $self['resultPayload'] = $resultPayload;
        null !== $resultSummary && $self['resultSummary'] = $resultSummary;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param array<string,mixed> $resultPayload
     */
    public function withResultPayload(array $resultPayload): self
    {
        $self = clone $this;
        $self['resultPayload'] = $resultPayload;

        return $self;
    }

    public function withResultSummary(string $resultSummary): self
    {
        $self = clone $this;
        $self['resultSummary'] = $resultSummary;

        return $self;
    }

    /**
     * @param RunStatus|value-of<RunStatus> $status
     */
    public function withStatus(RunStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
