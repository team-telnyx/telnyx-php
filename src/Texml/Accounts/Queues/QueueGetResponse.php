<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type QueueGetResponseShape = array{
 *   accountSid?: string|null,
 *   averageWaitTime?: int|null,
 *   currentSize?: int|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   maxSize?: int|null,
 *   sid?: string|null,
 *   subresourceUris?: array<string,mixed>|null,
 *   uri?: string|null,
 * }
 */
final class QueueGetResponse implements BaseModel
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The average wait time in seconds for members in the queue.
     */
    #[Optional('average_wait_time')]
    public ?int $averageWaitTime;

    /**
     * The current number of members in the queue.
     */
    #[Optional('current_size')]
    public ?int $currentSize;

    /**
     * The timestamp of when the resource was created.
     */
    #[Optional('date_created')]
    public ?string $dateCreated;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Optional('date_updated')]
    public ?string $dateUpdated;

    /**
     * The maximum size of the queue.
     */
    #[Optional('max_size')]
    public ?int $maxSize;

    /**
     * The unique identifier of the queue.
     */
    #[Optional]
    public ?string $sid;

    /**
     * A list of related resources identified by their relative URIs.
     *
     * @var array<string,mixed>|null $subresourceUris
     */
    #[Optional('subresource_uris', map: 'mixed')]
    public ?array $subresourceUris;

    /**
     * The relative URI for this queue.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $subresourceUris
     */
    public static function with(
        ?string $accountSid = null,
        ?int $averageWaitTime = null,
        ?int $currentSize = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?int $maxSize = null,
        ?string $sid = null,
        ?array $subresourceUris = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $averageWaitTime && $self['averageWaitTime'] = $averageWaitTime;
        null !== $currentSize && $self['currentSize'] = $currentSize;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $maxSize && $self['maxSize'] = $maxSize;
        null !== $sid && $self['sid'] = $sid;
        null !== $subresourceUris && $self['subresourceUris'] = $subresourceUris;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The average wait time in seconds for members in the queue.
     */
    public function withAverageWaitTime(int $averageWaitTime): self
    {
        $self = clone $this;
        $self['averageWaitTime'] = $averageWaitTime;

        return $self;
    }

    /**
     * The current number of members in the queue.
     */
    public function withCurrentSize(int $currentSize): self
    {
        $self = clone $this;
        $self['currentSize'] = $currentSize;

        return $self;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * The maximum size of the queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $self = clone $this;
        $self['maxSize'] = $maxSize;

        return $self;
    }

    /**
     * The unique identifier of the queue.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * A list of related resources identified by their relative URIs.
     *
     * @param array<string,mixed> $subresourceUris
     */
    public function withSubresourceUris(array $subresourceUris): self
    {
        $self = clone $this;
        $self['subresourceUris'] = $subresourceUris;

        return $self;
    }

    /**
     * The relative URI for this queue.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
