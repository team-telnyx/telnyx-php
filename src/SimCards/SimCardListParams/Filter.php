<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter\Status;

/**
 * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
 *
 * @phpstan-type filter_alias = array{
 *   iccid?: string, status?: list<value-of<Status>>, tags?: list<string>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * A search string to partially match for the SIM card's ICCID.
     */
    #[Api(optional: true)]
    public ?string $iccid;

    /**
     * Filter by a SIM card's status.
     *
     * @var list<value-of<Status>>|null $status
     */
    #[Api(list: Status::class, optional: true)]
    public ?array $status;

    /**
     * A list of SIM card tags to filter on.<br/><br/>
     *  If the SIM card contains <b><i>all</i></b> of the given <code>tags</code> they will be found.<br/><br/>
     * For example, if the SIM cards have the following tags: <ul>
     *   <li><code>['customers', 'staff', 'test']</code>
     *   <li><code>['test']</code></li>
     *   <li><code>['customers']</code></li>
     * </ul>
     * Searching for <code>['customers', 'test']</code> returns only the first because it's the only one with both tags.<br/> Searching for <code>test</code> returns the first two SIMs, because both of them have such tag.<br/> Searching for <code>customers</code> returns the first and last SIMs.<br/>.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Status|value-of<Status>> $status
     * @param list<string> $tags
     */
    public static function with(
        ?string $iccid = null,
        ?array $status = null,
        ?array $tags = null
    ): self {
        $obj = new self;

        null !== $iccid && $obj->iccid = $iccid;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * A search string to partially match for the SIM card's ICCID.
     */
    public function withIccid(string $iccid): self
    {
        $obj = clone $this;
        $obj->iccid = $iccid;

        return $obj;
    }

    /**
     * Filter by a SIM card's status.
     *
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * A list of SIM card tags to filter on.<br/><br/>
     *  If the SIM card contains <b><i>all</i></b> of the given <code>tags</code> they will be found.<br/><br/>
     * For example, if the SIM cards have the following tags: <ul>
     *   <li><code>['customers', 'staff', 'test']</code>
     *   <li><code>['test']</code></li>
     *   <li><code>['customers']</code></li>
     * </ul>
     * Searching for <code>['customers', 'test']</code> returns only the first because it's the only one with both tags.<br/> Searching for <code>test</code> returns the first two SIMs, because both of them have such tag.<br/> Searching for <code>customers</code> returns the first and last SIMs.<br/>.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }
}
