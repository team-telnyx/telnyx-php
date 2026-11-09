<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists the requests the instance served with its keys, newest first, one page at a time. The window defaults to the last 24 hours and spans at most 31 days. A row appears a few seconds after its request. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGatewaysService::retrieveSpendLogs()
 *
 * @phpstan-type AgentGatewayRetrieveSpendLogsParamsShape = array{
 *   end?: \DateTimeInterface|null,
 *   keyID?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   start?: \DateTimeInterface|null,
 *   teamID?: string|null,
 * }
 */
final class AgentGatewayRetrieveSpendLogsParams implements BaseModel
{
    /** @use SdkModel<AgentGatewayRetrieveSpendLogsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The window's end, an RFC 3339 timestamp with an offset. Defaults to now.
     */
    #[Optional]
    public ?\DateTimeInterface $end;

    /**
     * Only the requests made with this key.
     */
    #[Optional]
    public ?string $keyID;

    /**
     * The page to return, counting from 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Results per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * The window's start, an RFC 3339 timestamp with an offset. Defaults to 24 hours before `end`.
     */
    #[Optional]
    public ?\DateTimeInterface $start;

    /**
     * Only the requests made with this team's keys.
     */
    #[Optional]
    public ?string $teamID;

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
        ?\DateTimeInterface $end = null,
        ?string $keyID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?\DateTimeInterface $start = null,
        ?string $teamID = null,
    ): self {
        $self = new self;

        null !== $end && $self['end'] = $end;
        null !== $keyID && $self['keyID'] = $keyID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $start && $self['start'] = $start;
        null !== $teamID && $self['teamID'] = $teamID;

        return $self;
    }

    /**
     * The window's end, an RFC 3339 timestamp with an offset. Defaults to now.
     */
    public function withEnd(\DateTimeInterface $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Only the requests made with this key.
     */
    public function withKeyID(string $keyID): self
    {
        $self = clone $this;
        $self['keyID'] = $keyID;

        return $self;
    }

    /**
     * The page to return, counting from 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * The window's start, an RFC 3339 timestamp with an offset. Defaults to 24 hours before `end`.
     */
    public function withStart(\DateTimeInterface $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * Only the requests made with this team's keys.
     */
    public function withTeamID(string $teamID): self
    {
        $self = clone $this;
        $self['teamID'] = $teamID;

        return $self;
    }
}
