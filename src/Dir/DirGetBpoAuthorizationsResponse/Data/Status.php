<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data;

/**
 * Review state of this authorization. `pending` when the authorization is first added, or when you send a different `loa_document_id` for this BPO in `bpo_authorizations` (uploading a document alone changes nothing). Approving the DIR approves its pending authorizations; an admin can also approve or reject one on its own. Only an `approved` authorization adds the BPO to this DIR's authorized callers in the branded calling registry.
 */
enum Status: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
