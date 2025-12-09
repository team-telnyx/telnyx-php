<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Request;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Response;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\Status;

/**
 * Webhook delivery attempt details.
 *
 * @phpstan-type AttemptShape = array{
 *   errors?: list<int>|null,
 *   finishedAt?: \DateTimeInterface|null,
 *   http?: HTTP|null,
 *   startedAt?: \DateTimeInterface|null,
 *   status?: value-of<\Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\Status>|null,
 * }
 */
final class Attempt implements BaseModel
{
    /** @use SdkModel<AttemptShape> */
    use SdkModel;

    /**
     * Webhook delivery error codes.
     *
     * @var list<int>|null $errors
     */
    #[Optional(list: 'int')]
    public ?array $errors;

    /**
     * ISO 8601 timestamp indicating when the attempt has finished.
     */
    #[Optional('finished_at')]
    public ?\DateTimeInterface $finishedAt;

    /**
     * HTTP request and response information.
     */
    #[Optional]
    public ?HTTP $http;

    /**
     * ISO 8601 timestamp indicating when the attempt was initiated.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * @var value-of<Status>|null $status
     */
    #[Optional(
        enum: Status::class,
    )]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $errors
     * @param HTTP|array{request?: Request|null, response?: Response|null} $http
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?array $errors = null,
        ?\DateTimeInterface $finishedAt = null,
        HTTP|array|null $http = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $errors && $self['errors'] = $errors;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $http && $self['http'] = $http;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Webhook delivery error codes.
     *
     * @param list<int> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * ISO 8601 timestamp indicating when the attempt has finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    /**
     * HTTP request and response information.
     *
     * @param HTTP|array{request?: Request|null, response?: Response|null} $http
     */
    public function withHTTP(HTTP|array $http): self
    {
        $self = clone $this;
        $self['http'] = $http;

        return $self;
    }

    /**
     * ISO 8601 timestamp indicating when the attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
