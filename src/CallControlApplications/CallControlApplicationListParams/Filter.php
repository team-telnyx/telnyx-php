<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications\CallControlApplicationListParams;

use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\ApplicationName;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\OccurredAt;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Product;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Status;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
 *
 * @phpstan-import-type ApplicationNameShape from \Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\ApplicationName
 * @phpstan-import-type OccurredAtShape from \Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\OccurredAt
 *
 * @phpstan-type FilterShape = array{
 *   applicationName?: null|ApplicationName|ApplicationNameShape,
 *   applicationSessionID?: string|null,
 *   connectionID?: string|null,
 *   failed?: bool|null,
 *   from?: string|null,
 *   legID?: string|null,
 *   name?: string|null,
 *   occurredAt?: null|OccurredAt|OccurredAtShape,
 *   outboundOutboundVoiceProfileID?: string|null,
 *   product?: null|Product|value-of<Product>,
 *   status?: null|Status|value-of<Status>,
 *   to?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Application name filters.
     */
    #[Optional('application_name')]
    public ?ApplicationName $applicationName;

    /**
     * The unique identifier of the call session. A session may include multiple call leg events.
     */
    #[Optional('application_session_id')]
    public ?string $applicationSessionID;

    /**
     * The unique identifier of the conection.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Delivery failed or not.
     */
    #[Optional]
    public ?bool $failed;

    /**
     * Filter by From number.
     */
    #[Optional]
    public ?string $from;

    /**
     * The unique identifier of an individual call leg.
     */
    #[Optional('leg_id')]
    public ?string $legID;

    /**
     * If present, conferences will be filtered to those with a matching `name` attribute. Matching is case-sensitive.
     */
    #[Optional]
    public ?string $name;

    /**
     * Event occurred_at filters.
     */
    #[Optional('occurred_at')]
    public ?OccurredAt $occurredAt;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional('outbound.outbound_voice_profile_id')]
    public ?string $outboundOutboundVoiceProfileID;

    /**
     * Filter by product.
     *
     * @var value-of<Product>|null $product
     */
    #[Optional(enum: Product::class)]
    public ?string $product;

    /**
     * If present, conferences will be filtered by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by To number.
     */
    #[Optional]
    public ?string $to;

    /**
     * Event type.
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
     * @param ApplicationNameShape $applicationName
     * @param OccurredAtShape $occurredAt
     * @param Product|value-of<Product> $product
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ApplicationName|array|null $applicationName = null,
        ?string $applicationSessionID = null,
        ?string $connectionID = null,
        ?bool $failed = null,
        ?string $from = null,
        ?string $legID = null,
        ?string $name = null,
        OccurredAt|array|null $occurredAt = null,
        ?string $outboundOutboundVoiceProfileID = null,
        Product|string|null $product = null,
        Status|string|null $status = null,
        ?string $to = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $applicationName && $self['applicationName'] = $applicationName;
        null !== $applicationSessionID && $self['applicationSessionID'] = $applicationSessionID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $failed && $self['failed'] = $failed;
        null !== $from && $self['from'] = $from;
        null !== $legID && $self['legID'] = $legID;
        null !== $name && $self['name'] = $name;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        null !== $outboundOutboundVoiceProfileID && $self['outboundOutboundVoiceProfileID'] = $outboundOutboundVoiceProfileID;
        null !== $product && $self['product'] = $product;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Application name filters.
     *
     * @param ApplicationNameShape $applicationName
     */
    public function withApplicationName(
        ApplicationName|array $applicationName
    ): self {
        $self = clone $this;
        $self['applicationName'] = $applicationName;

        return $self;
    }

    /**
     * The unique identifier of the call session. A session may include multiple call leg events.
     */
    public function withApplicationSessionID(string $applicationSessionID): self
    {
        $self = clone $this;
        $self['applicationSessionID'] = $applicationSessionID;

        return $self;
    }

    /**
     * The unique identifier of the conection.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Delivery failed or not.
     */
    public function withFailed(bool $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }

    /**
     * Filter by From number.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The unique identifier of an individual call leg.
     */
    public function withLegID(string $legID): self
    {
        $self = clone $this;
        $self['legID'] = $legID;

        return $self;
    }

    /**
     * If present, conferences will be filtered to those with a matching `name` attribute. Matching is case-sensitive.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Event occurred_at filters.
     *
     * @param OccurredAtShape $occurredAt
     */
    public function withOccurredAt(OccurredAt|array $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundOutboundVoiceProfileID(
        string $outboundOutboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundOutboundVoiceProfileID'] = $outboundOutboundVoiceProfileID;

        return $self;
    }

    /**
     * Filter by product.
     *
     * @param Product|value-of<Product> $product
     */
    public function withProduct(Product|string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * If present, conferences will be filtered by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by To number.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Event type.
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
