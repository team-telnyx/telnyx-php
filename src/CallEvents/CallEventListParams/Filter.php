<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListParams;

use Telnyx\CallEvents\CallEventListParams\Filter\ApplicationName;
use Telnyx\CallEvents\CallEventListParams\Filter\OccurredAt;
use Telnyx\CallEvents\CallEventListParams\Filter\Product;
use Telnyx\CallEvents\CallEventListParams\Filter\Status;
use Telnyx\CallEvents\CallEventListParams\Filter\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   applicationName?: ApplicationName|null,
 *   applicationSessionID?: string|null,
 *   connectionID?: string|null,
 *   failed?: bool|null,
 *   from?: string|null,
 *   legID?: string|null,
 *   name?: string|null,
 *   occurredAt?: OccurredAt|null,
 *   outboundOutboundVoiceProfileID?: string|null,
 *   product?: value-of<Product>|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   type?: value-of<Type>|null,
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
     * @param ApplicationName|array{contains?: string|null} $applicationName
     * @param OccurredAt|array{
     *   eq?: string|null,
     *   gt?: string|null,
     *   gte?: string|null,
     *   lt?: string|null,
     *   lte?: string|null,
     * } $occurredAt
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
        $obj = new self;

        null !== $applicationName && $obj['applicationName'] = $applicationName;
        null !== $applicationSessionID && $obj['applicationSessionID'] = $applicationSessionID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $failed && $obj['failed'] = $failed;
        null !== $from && $obj['from'] = $from;
        null !== $legID && $obj['legID'] = $legID;
        null !== $name && $obj['name'] = $name;
        null !== $occurredAt && $obj['occurredAt'] = $occurredAt;
        null !== $outboundOutboundVoiceProfileID && $obj['outboundOutboundVoiceProfileID'] = $outboundOutboundVoiceProfileID;
        null !== $product && $obj['product'] = $product;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj['to'] = $to;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Application name filters.
     *
     * @param ApplicationName|array{contains?: string|null} $applicationName
     */
    public function withApplicationName(
        ApplicationName|array $applicationName
    ): self {
        $obj = clone $this;
        $obj['applicationName'] = $applicationName;

        return $obj;
    }

    /**
     * The unique identifier of the call session. A session may include multiple call leg events.
     */
    public function withApplicationSessionID(string $applicationSessionID): self
    {
        $obj = clone $this;
        $obj['applicationSessionID'] = $applicationSessionID;

        return $obj;
    }

    /**
     * The unique identifier of the conection.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Delivery failed or not.
     */
    public function withFailed(bool $failed): self
    {
        $obj = clone $this;
        $obj['failed'] = $failed;

        return $obj;
    }

    /**
     * Filter by From number.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The unique identifier of an individual call leg.
     */
    public function withLegID(string $legID): self
    {
        $obj = clone $this;
        $obj['legID'] = $legID;

        return $obj;
    }

    /**
     * If present, conferences will be filtered to those with a matching `name` attribute. Matching is case-sensitive.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Event occurred_at filters.
     *
     * @param OccurredAt|array{
     *   eq?: string|null,
     *   gt?: string|null,
     *   gte?: string|null,
     *   lt?: string|null,
     *   lte?: string|null,
     * } $occurredAt
     */
    public function withOccurredAt(OccurredAt|array $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundOutboundVoiceProfileID(
        string $outboundOutboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outboundOutboundVoiceProfileID'] = $outboundOutboundVoiceProfileID;

        return $obj;
    }

    /**
     * Filter by product.
     *
     * @param Product|value-of<Product> $product
     */
    public function withProduct(Product|string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    /**
     * If present, conferences will be filtered by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by To number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
