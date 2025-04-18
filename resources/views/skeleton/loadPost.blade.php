<div style="width: 90% ;display: flex; flex-direction: row; gap: 20px; flex-wrap: wrap; justify-content: start;">
    @for ($i = 0; $i < 4; $i++)
        <svg role="img" width="380" height="580" aria-labelledby="loading-aria" viewBox="0 0 380 580"
            preserveAspectRatio="none">
            <title id="loading-aria">Loading...</title>
            <rect x="0" y="0" width="100%" height="100%" clip-path="url(#clip-path)" style='fill: url("#fill");'>
            </rect>
            <defs>
                <clipPath id="clip-path">
                    <rect x="0" y="12" rx="10" ry="10" width="380" height="363" />
                    <rect x="0" y="385" rx="10" ry="10" width="380" height="40" />
                    <rect x="10" y="540" rx="10" ry="10" width="73" height="34" />
                    <rect x="290" y="540" rx="10" ry="10" width="73" height="34" />
                    <rect x="0" y="500" rx="10" ry="10" width="380" height="22" />
                    <rect x="0" y="441" rx="10" ry="10" width="380" height="22" />
                    <rect x="0" y="470" rx="10" ry="10" width="380" height="22" />
                </clipPath>
                <linearGradient id="fill">
                    <stop offset="0.599964" stop-color="#cfcece" stop-opacity="1">
                        <animate attributeName="offset" values="-2; -2; 1" keyTimes="0; 0.25; 1" dur="2s"
                            repeatCount="indefinite"></animate>
                    </stop>
                    <stop offset="1.59996" stop-color="#ecebeb" stop-opacity="1">
                        <animate attributeName="offset" values="-1; -1; 2" keyTimes="0; 0.25; 1" dur="2s"
                            repeatCount="indefinite"></animate>
                    </stop>
                    <stop offset="2.59996" stop-color="#cfcece" stop-opacity="1">
                        <animate attributeName="offset" values="0; 0; 3" keyTimes="0; 0.25; 1" dur="2s"
                            repeatCount="indefinite"></animate>
                    </stop>
                </linearGradient>
            </defs>
        </svg>
    @endfor
</div>
