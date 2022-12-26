<template>
  <div class="about-me-tab" id="aboutme">
    <h5 class="text-uppercase">
      <i class="mdi mdi-briefcase mr-1"></i> Experience
    </h5>

    <div class="timeline-alt pb-0">
      <div class="timeline-item">
        <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
        <div class="timeline-item-info">
          <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
          <p class="font-14">
            websitename.com
            <span class="ml-2 font-12">Year: 2015 - 18</span>
          </p>
          <p class="text-muted mt-2 mb-0 pb-3">
            Everyone realizes why a new common language would be desirable: one
            could refuse to pay expensive translators. To achieve this, it would
            be necessary to have uniform grammar, pronunciation and more common
            words.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <i
          class="mdi mdi-circle bg-primary-lighten text-primary timeline-icon"
        ></i>
        <div class="timeline-item-info">
          <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
          <p class="font-14">
            Software Inc.
            <span class="ml-2 font-12">Year: 2012 - 15</span>
          </p>
          <p class="text-muted mt-2 mb-0 pb-3">
            If several languages coalesce, the grammar of the resulting language
            is more simple and regular than that of the individual languages.
            The new common language will be more simple and regular than the
            existing European languages.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
        <div class="timeline-item-info">
          <h5 class="mt-0 mb-1">Graphic Designer</h5>
          <p class="font-14">
            Coderthemes Design LLP
            <span class="ml-2 font-12">Year: 2010 - 12</span>
          </p>
          <p class="text-muted mt-2 mb-0 pb-2">
            The European languages are members of the same family. Their
            separate existence is a myth. For science music sport etc, Europe
            uses the same vocabulary. The languages only differ in their grammar
            their pronunciation.
          </p>
        </div>
      </div>
    </div>
    <!-- end timeline -->

    <h5 class="mb-3 mt-4 text-uppercase">
      <i class="mdi mdi-cards-variant mr-1"></i> Projects
    </h5>
    <div class="table-responsive">
      <table class="table table-borderless table-nowrap mb-0">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Clients</th>
            <th>Project Name</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>
              <img
                src="@/assets/images/users/avatar-2.jpg"
                alt="table-user"
                class="mr-2 rounded-circle"
                height="24"
              />
              Halette Boivin
            </td>
            <td>App design and development</td>
            <td>01/01/2015</td>
            <td>10/15/2018</td>
            <td>
              <span class="badge badge-info-lighten">Work in Progress</span>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>
              <img
                src="@/assets/images/users/avatar-3.jpg"
                alt="table-user"
                class="mr-2 rounded-circle"
                height="24"
              />
              Durandana Jolicoeur
            </td>
            <td>Coffee detail page - Main Page</td>
            <td>21/07/2016</td>
            <td>12/05/2018</td>
            <td>
              <span class="badge badge-danger-lighten">Pending</span>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>
              <img
                src="@/assets/images/users/avatar-4.jpg"
                alt="table-user"
                class="mr-2 rounded-circle"
                height="24"
              />
              Lucas Sabourin
            </td>
            <td>Poster illustation design</td>
            <td>18/03/2018</td>
            <td>28/09/2018</td>
            <td>
              <span class="badge badge-success-lighten">Done</span>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td>
              <img
                src="@/assets/images/users/avatar-6.jpg"
                alt="table-user"
                class="mr-2 rounded-circle"
                height="24"
              />
              Donatien Brunelle
            </td>
            <td>Drinking bottle graphics</td>
            <td>02/10/2017</td>
            <td>07/05/2018</td>
            <td>
              <span class="badge badge-info-lighten">Work in Progress</span>
            </td>
          </tr>
          <tr>
            <td>5</td>
            <td>
              <img
                src="@/assets/images/users/avatar-5.jpg"
                alt="table-user"
                class="mr-2 rounded-circle"
                height="24"
              />
              Karel Auberjo
            </td>
            <td>Landing page design - Home</td>
            <td>17/01/2017</td>
            <td>25/05/2021</td>
            <td>
              <span class="badge badge-warning-lighten">Coming soon</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  // component properties and methods
});
</script>
