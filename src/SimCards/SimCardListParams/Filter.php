<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter\Status;

/**
 * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   iccid?: string|null,
 *   status?: list<Status|value-of<Status>>|null,
 *   tags?: list<string>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * A search string to partially match for the SIM card's ICCID.
     */
    #[Optional]
    public ?string $iccid;

    /**
     * Filter by a SIM card's status.
     *
     * @var list<value-of<Status>>|null $status
     */
    #[Optional(list: Status::class)]
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
    #[Optional(list: 'string')]
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
     * @param list<Status|value-of<Status>>|null $status
     * @param list<string>|null $tags
     */
    public static function with(
        ?string $iccid = null,
        ?array $status = null,
        ?array $tags = null
    ): self {
        $self = new self;

        null !== $iccid && $self['iccid'] = $iccid;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * A search string to partially match for the SIM card's ICCID.
     */
    public function withIccid(string $iccid): self
    {
        $self = clone $this;
        $self['iccid'] = $iccid;

        return $self;
    }

    /**
     * Filter by a SIM card's status.
     *
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
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
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
