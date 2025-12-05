<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type UserBundleGetResponseShape = array{data: UserBundle}
 */
final class UserBundleGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UserBundleGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public UserBundle $data;

    /**
     * `new UserBundleGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleGetResponse)->withData(...)
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
     * @param UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(UserBundle|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(UserBundle|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
