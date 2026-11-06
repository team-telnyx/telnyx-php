<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams;

/**
 * Recording layout for Google Meet and Teams. Defaults to speaker_view. Accepted at creation only; does not enable recording by itself.
 */
enum RecordingView: string
{
    case SPEAKER_VIEW = 'speaker_view';

    case GALLERY_VIEW = 'gallery_view';

    case SPEAKER_VIEW_NO_SIDEBAR = 'speaker_view_no_sidebar';
}
