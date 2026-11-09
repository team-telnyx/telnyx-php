<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession\Config;

/**
 * Non-default recording layout. Omitted for the default speaker_view layout.
 */
enum RecordingView: string
{
    case GALLERY_VIEW = 'gallery_view';

    case SPEAKER_VIEW_NO_SIDEBAR = 'speaker_view_no_sidebar';
}
